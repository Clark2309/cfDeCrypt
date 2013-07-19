<?php
// src/cf/cfDeCryptBundle/Controller/PageController.php

namespace cf\cfDeCryptBundle\Controller;

use cf\cfDeCryptBundle\Entity\Enquiry;
use cf\cfDeCryptBundle\Form\EnquiryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('cfDeCryptBundle:Page:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('cfDeCryptBundle:Page:about.html.twig');
    }

    public function contactAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from cdDeCrypt')
                    ->setFrom('enquiries@cfDeCrypt.hurstweb.de')
                    ->setTo($this->container->getParameter('cfDeCrpyt.emails.contact_email'))
                    ->setBody($this->renderView('cfDeCryptBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);

                $this->get('session')->setFlash('cf-notice', 'Your contact enquiry was successfully sent. Thank you!');

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('cfDeCryptBundle_contact'));
            }
        }

        return $this->render('cfDeCryptBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }}
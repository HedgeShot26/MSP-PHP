<?php

namespace App\Controllers;
use App\Models\ContactModel;

class Contact extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    //CONTACT PAGE
    public function contact()
    {
        $data = [
            'meta_title' => 'Contact | MFD',
        ];

        return view('page_templates/contact', $data);
    }

    //SAVE
    public function save()
    {
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your full name is required'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'You must enter a valid email',
                ]
            ],
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required',
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Message is required',
                ]
            ],
        ]);

        $data = [
            'meta_title' => 'Contact | MFD',
            'validation' => $this->validator
        ];

        if (!$validation) {
            return view('page_templates/contact', $data);
        } else {

            // Let's Register user into db
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $title = $this->request->getPost('title');
            $content = $this->request->getPost('content');

            $values = [
                'name' => $name,
                'email' => $email,
                'title' => $title,
                'content' => $content,
            ];

            $to = $this->request->getVar('email');

            //Email
            $email = \Config\Services::email();

            //This will send to sender email for copy/confirmation and the set email will also get to reply
            // To who -- From who
            $email->setFrom('etcrobo.test1@gmail.com', 'MFD Contact Us');
            $email->setTo($to);

            $email->setSubject($title);
            $email->setMessage($content);

            $contactModel = new ContactModel();
            $query = $contactModel->insert($values);
            if ($query && $email->send()) {
                return redirect()->to('contact')->with('success', 'Your message are successful sent');
            } else {
                return redirect()->to('contact')->with('failed', 'Error: Something went Wrong');
            }
        }
    }
}

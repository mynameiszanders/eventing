<?php

  if (!defined('E_FRAMEWORK')) {
    headers_sent() || header('HTTP/1.1 404 Not Found', true, 404);
    exit('Direct script access is disallowed.');
  }

  /**
   * Eventing Home Controller Class (framework default)
   */
  final class home extends E_controller
  {

    public function __construct() {
      parent::controller();
    }

    public function index() {
      // This library should already be loaded, but just in case.
      $this->load->library('template');
      $this->template->create(array(
        'shell'
      ));
      $this->template->section('shell')->add('title', 'Eventing Framework');
      $this->template->load('shell');
    }

    public function html5()
    {
      $this->load->library('template');

      // Set the theme folder we have saved all these in.
      $this->template->set_theme('html5');
      
      // Load the views into objects that we can use.
      $this->template->create(array(
        // Structure
        'shell' => 'xhtml5shell',
        'style',
        'script',
        'header',
        'nav',
        'content',
        'footer',
      
        // Content
        'node_1' => 'node',
        'node_2' => 'node'
      ));
      // Add data to the
      $this->template->section('shell')->add(array(
        'title' => 'HTML5 Eventing Template'
      ));
      $this->template->section('nav')->add(array(
        // List of links. The format has yet to be decided.
        'primary' => array()
      ));
      // Create a pseudo-section. Not a section on it's own, but a collection of
      // other sections.
      $this->template->combine('posts', array('node_1', 'node_2'));
      $links = array(
        'shell' => array('style', 'script', 'header', 'content', 'sidebar', 'footer'),
        'header' => array('nav'),
        'content' => array('posts'),
      );
      // Symbolically link the views together and load the parent.
      $this->template->link($links);
      $this->template->load('shell');
    }
    
  }

<?php

require_once dirname(__FILE__).'/../lib/BasesfMarkitupPluginActions.class.php';

/**
 * sfMarkitupPlugin actions.
 * 
 * @package    sfMarkitupPlugin
 * @subpackage sfMarkitupPlugin
 * @author     Miami <miami@blackcrystal.net>
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class sfMarkitupPluginActions extends BasesfMarkitupPluginActions
{
  
  

  public function executePreview(sfWebRequest $request)
  {
    if ($request->isMethod('post') )
    {
      sfContext::getInstance()->getConfiguration()->loadHelpers('Markdown');
      $preview = Markdown($request->getParameter('data',''));
      exit("<html><body>{$preview}</body></html>");
    }
    return sfView::NONE;
  }
  
  public function executeUpload(sfWebRequest $request)
  { 
    $form = new sfMarkitupUploadForm();
    if ($request->isMethod('post') )
    {
      $form->bind( $request->getParameter( $form->getName() ), $request->getFiles( $form->getName() ));
      exit( $form->save() );
    }
    return sfView::NONE;
  }

  
}

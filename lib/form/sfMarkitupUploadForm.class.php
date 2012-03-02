<?php

/**
 * sfMarkitupUploadForm
 * Process upload and return path
 * 
 * @package    sfMarkitupPlugin
 * @subpackage sfMarkitupPlugin
 * @author     Miami <miami@blackcrystal.net>
 */


class sfMarkitupUploadForm extends sfForm {
  
   
   public function setup()
  {
     
    $this->widgetSchema['file'] = new sfWidgetFormInputFile();
    
    $this->validatorSchema['file'] = new sfValidatorFile(array(
      'required'   => true,
      'path'       => $this->getUploadTo(),
      'mime_types' => 'web_images'
      //'validated_file_class' => 'sfValidatedFile'
    ));

    $this->widgetSchema->setNameFormat('upload[%s]');
    
    $this->disableCSRFProtection();
  }

  public function getUploadTo()
  {
    $path = sfConfig::get('app_markitup_uploadTo', 'assets' );
    return sfConfig::get('sf_upload_dir') . '/'. $path;
  }
  

  public function save()
  {
    if (!$this->isValid()) return '';
    $filename = $this->getValue('file')->save();
    sfContext::getInstance()->getConfiguration()->loadHelpers('Asset');
    return image_path( implode('/', array(
            sfConfig::get('sf_upload_uri', '/uploads'),
            sfConfig::get('app_markitup_uploadTo', 'assets' ) ,
            $filename )));
  }
  
  
  
}


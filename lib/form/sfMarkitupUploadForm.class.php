<?php

class sfMarkitupUploadForm extends sfForm {
  
   




   public function setup()
  {
    
    $this->widgetSchema['file'] = new sfWidgetFormInputFile();
    
    $this->validatorSchema['file'] = new sfValidatorFile(array(
      'required'   => true,
      'path'       => sfConfig::get('sf_upload_dir') . '/assets',
      'mime_types' => 'web_images',
      //'validated_file_class' => 'sfValidatedFile'
    ));

    $this->widgetSchema->setNameFormat('upload[%s]');
    
    $this->disableCSRFProtection();
  }
  
  

  public function getFilePath()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Url');
    if ($this->isValid())
      return public_path ('/uploads/assets/') . basename( $this->getValue('file'));
  }
  
  public function save()
  {
    if (!$this->isValid()) return '';
    $filename = $this->getValue('file')->save();
    sfContext::getInstance()->getConfiguration()->loadHelpers('Url');
    return public_path ('/uploads/assets/') . basename( $filename );
  }
}


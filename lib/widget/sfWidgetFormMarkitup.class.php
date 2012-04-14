<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @author     Lukasz Sarzynski <LukaszSarzynski@gmail.com>
 * @author     Tomasz Zdanowski <tomasz@mikran.pl>
 *
 */
class sfWidgetFormMarkitup extends sfWidgetFormTextarea
{

  
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * settings:  The markItUp settings
   *  * set: The markItUp set
   *  * skin: The markItUp skin
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('settings', 'mySettings');
    $this->addOption('set',  'markdown');
    $this->addOption('skin', 'simple');
    $this->addOption('previewAction', sfConfig::get('app_markitup_previewAction', 'sfMarkitupPlugin/preview'));
    $this->addOption('uploadAction',  sfConfig::get('app_markitup_uploadAction',  'sfMarkitupPlugin/upload'));
    parent::configure($options, $attributes);
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The value selected in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $textarea = parent::render($name, $value, $attributes, $errors);
    $js = sprintf(<<<EOF
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function()	{

  %s.previewParserPath = '%s';
  InlineUpload.options.action = '%s';
  
	jQuery('#%s').markItUp(%s);
});
//]]>
</script>
EOF
    , 
    $this->getOption('settings'),
 
    sfContext::getInstance()->getController()->genUrl( $this->getOption('previewAction') ) ,
    sfContext::getInstance()->getController()->genUrl( $this->getOption('uploadAction') ) ,
            
    $this->generateId($name),
    $this->getOption('settings')
    );

    sfContext::getInstance()->getResponse()->setSlot('inlineJsForMarkitup', $js);
    return $textarea;
  }

  /**
   * Gets the stylesheet paths associated with the widget.
   *
   * @return array An array of stylesheet paths
   */
  public function getStylesheets()
  {
    return array(
        '/sfMarkitupPlugin/markitup/skins/' . $this->getOption('skin') . '/style.css' => 'all',
        '/sfMarkitupPlugin/markitup/sets/' .  $this->getOption('set') .  '/style.css' => 'all'
    );
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array(
        '/sfMarkitupPlugin/markitup/jquery.markitup.js',
        '/sfMarkitupPlugin/markitup/sets/' . $this->getOption('set') . '/set.js'
    );
  }
  
  
}
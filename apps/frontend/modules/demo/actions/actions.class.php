<?php

/**
 * demo actions.
 *
 * @package    cacophony
 * @subpackage demo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class demoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'index');
  }
  
  /**
   * Vimeo action
   * 
   * @param sfWebRequest $request 
   */
  public function executeVimeo(sfWebRequest $request)
  {
    $this->videos = json_decode(sfCacophonyOAuth::call(
      'vimeo.videos.getUploaded',
      'vimeo',
      $this->getUser()->getAttribute('accessToken',null,'sfCacophonyPlugin/vimeo')
    ));
  }
  
  /**
   * Twitter action
   * 
   * @param sfWebRequest $request 
   */
  public function executeTwitter(sfWebRequest $request)
  {
    $timeline = json_decode(sfCacophonyOAuth::call(
      'statuses/home_timeline',
      'twitter',
      $this->getUser()->getAttribute('accessToken',null,'sfCacophonyPlugin/twitter')
    ));
    
    $this->setVar('timeline', $timeline, true);
  }
  
  /**
   * Facebook action
   * 
   * @param sfWebRequest $request 
   */
  public function executeFacebook(sfWebRequest $request)
  {
    $feed = json_decode(sfCacophonyOAuth::call(
      'me/home',
      'facebook',
      $this->getUser()->getAttribute('accessToken',null,'sfCacophonyPlugin/facebook')
    ));
    
    $this->setVar('feed', $feed, true);
  }

  /**
   * Executes Netflix demo
   *
   * @param sfWebRequest $request
   */
  public function executeNetflix(sfWebRequest $request)
  {
    $titles = json_decode(sfCacophonyOAuth::call(
      'catalog/titles/autocomplete',
      'netflix',
      $this->getUser()->getAttribute('accessToken',null,'sfCacophonyPlugin/netflix'),
      array('term' => 'star', 'start_index' => 0, 'max_results' => 10)
    ));

    $this->setVar('titles', $titles, true);
  }

  /**
   * Generic call action for all providers
   * 
   * @param sfWebRequest $request 
   * @return sfView::SUCCESS
   */
  public function executeCall(sfWebRequest $request)
  {
    $this->forward404Unless($request->getParameter('provider'));
    $this->forward404Unless($request->getParameter('method'));
    
    $config = sfConfig::get('app_cacophony');
    $this->forward404Unless(in_array($request->getParameter('provider'), array_keys($config['providers'])));
    
    $params = array();
    foreach($request->getParameterHolder()->getAll() as $k => $p)
      if( ! in_array($k,array('method','action','module','provider')))
        $params[$k] = $p;
      
    $result = json_decode(sfCacophonyOAuth::call(
      $request->getParameter('method'),
      $request->getParameter('provider'),
      $this->getUser()->getAttribute('accessToken', null, sprintf('sfCacophonyPlugin/%s',$request->getParameter('provider'))),
      $params
    ));
    
    $this->setVar('result', $result, true);
  }
}

<?php


class Extension extends Parsedown
{
    function __construct()
    {
        $this->BlockTypes['\\'][] = 'LuaCode';
    }

    protected function blockBoldText($Line,$Block)
    {
      if (preg_match('/^\\\\\\/', $Line['text'], $matches))
      {

        $Block = array(
          'element' => array(
            'text' => array(
              'name' => 'code',
              'text' => $Line['body'],
            ),
            'name' => 'pre',
            'handler' => 'element',
            'text' => array(
              'name' => 'code',
              'text' => $Line['body'],
            ),
          ),
        );


        /*return array(
          'char' => $Line['text'][0],
          'element' => array(
            'name' => 'strong',
          ),
          'text' => ''
        );*/

        return $Block;
      }
    }

    protected function blockBoldTextContinue($Line,$Block)
    {
      if (isset($Block['complete']))
      {
        return;
      }
      // A blank newline has occurred
      if (isset($Block['interrupted']))
      {
        $Block['element']['text'] .= "\n";
        unset($Block['interrupted']);
      }
      //Check for end of the block.
      if (preg_match('/\\\\\\/', $Line['text']))
      {
        $Block['element']['text'] = substr($Block['element']['text'], 1);
        $Block['complete'] = true;
        return $Block;
      }

      $Block['element']['text'] .= "\n".$Line['body'];

      return $block;
  }

  protected function blockBoldTextComplete($block)
  {
    return $block;
  }
}

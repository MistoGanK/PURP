<?php

if (!function_exists('dump')) {
  /**
   * * Captures the detailed dump of any data type using output buffering, 
   * sanitizes its content against XSS attacks, and formats it inline 
   *
   * @param mixed $data The variable, array, object, or expression to audit.
   * @return void
   */
  function dump($data)
  {
    ob_start();
    var_dump($data);
    $output = ob_get_clean();

    echo '<div style="background-color: #010400; color: #e6e8ee; padding: 1.125rem; border-radius: 0.375rem; font-family: \'Inter-Medium\', sans-serif; font-size: 0.8125rem; line-height: 1.6; border-left: 0.375rem solid #2c468a; border-top: 1px solid #9aa1af; border-right: 1px solid #9aa1af; border-bottom: 1px solid #9aa1af; margin: 1.25rem 0; overflow-x: auto; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.7);">';

    echo '<strong style="color: #b02a37; display: block; margin-bottom: 0.625rem; font-family: \'Montserrat-Bold\', sans-serif; text-transform: uppercase; letter-spacing: 0.05rem; font-size: 0.75rem;">🔍 POLICE SYSTEM — IN-MEMORY DATA INSPECTION:</strong>';

    echo '<pre style="margin: 0; white-space: pre-wrap; color: #fdfdfd; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 0.8125rem;">';

    echo htmlspecialchars($output, ENT_QUOTES, 'UTF-8');

    echo '</pre>';
    echo '</div>';
  }
}

if (!function_exists('dump_die')) {
  /**
   * Dump and Die: Inspects data and terminates script execution immediately.
   * * Executes the visual diagnostic helper and immediately halts the request 
   * life cycle on the server using the native die() statement.
   *
   * @param  mixed $data The variable, array, object, or expression to audit.
   * @return never
   */
  function dump_die($data)
  {
    dump($data);
    die();
  }
}
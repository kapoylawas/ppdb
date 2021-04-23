<?php

/*
<<<<<<< HEAD
 |--------------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------------
 | In development, we want to show as many errors as possible to help
 | make sure they don't make it to production. And save us hours of
 | painful debugging.
=======
  |--------------------------------------------------------------------------
  | ERROR DISPLAY
  |--------------------------------------------------------------------------
  | In development, we want to show as many errors as possible to help
  | make sure they don't make it to production. And save us hours of
  | painful debugging.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */
error_reporting(-1);
ini_set('display_errors', '1');

/*
<<<<<<< HEAD
 |--------------------------------------------------------------------------
 | DEBUG BACKTRACES
 |--------------------------------------------------------------------------
 | If true, this constant will tell the error screens to display debug
 | backtraces along with the other error information. If you would
 | prefer to not see this, set this value to false.
=======
  |--------------------------------------------------------------------------
  | DEBUG BACKTRACES
  |--------------------------------------------------------------------------
  | If true, this constant will tell the error screens to display debug
  | backtraces along with the other error information. If you would
  | prefer to not see this, set this value to false.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */
defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

/*
<<<<<<< HEAD
 |--------------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------------
 | Debug mode is an experimental flag that can allow changes throughout
 | the system. It's not widely used currently, and may not survive
 | release of the framework.
 */
=======
  |--------------------------------------------------------------------------
  | DEBUG MODE
  |--------------------------------------------------------------------------
  | Debug mode is an experimental flag that can allow changes throughout
  | the system. It's not widely used currently, and may not survive
  | release of the framework.
 */

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
defined('CI_DEBUG') || define('CI_DEBUG', true);

<?php

/*
<<<<<<< HEAD
 |--------------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------------
 | Don't show ANY in production environments. Instead, let the system catch
 | it and display a generic error message.
=======
  |--------------------------------------------------------------------------
  | ERROR DISPLAY
  |--------------------------------------------------------------------------
  | Don't show ANY in production environments. Instead, let the system catch
  | it and display a generic error message.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */
ini_set('display_errors', '0');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);

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
defined('CI_DEBUG') || define('CI_DEBUG', false);

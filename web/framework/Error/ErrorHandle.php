<?php
/**
 * 
 */
namespace lib;

class ErrorHandle
{

    static public function getErrorName($error)
    {
        $errors = [
            E_ERROR             => 'ERROR',
            E_WARNING           => 'WARNING',
            E_PARSE             => 'PARSE',
            E_NOTICE            => 'NOTICE',
            E_CORE_ERROR        => 'CORE_ERROR',
            E_CORE_WARNING      => 'CORE_WARNING',
            E_COMPILE_ERROR     => 'COMPILE_ERROR',
            E_COMPILE_WARNING   => 'COMPILE_WARNING',
            E_USER_ERROR        => 'USER_ERROR',
            E_USER_WARNING      => 'USER_WARNING',
            E_USER_NOTICE       => 'USER_NOTICE',
            E_STRICT            => 'STRICT',
            E_RECOVERABLE_ERROR => 'RECOVERABLE_ERROR',
            E_DEPRECATED        => 'DEPRECATED',
            E_USER_DEPRECATED   => 'USER_DEPRECATED',
        ];

        if (array_key_exists($error, $errors))
        {
            return $errors[$error] . " [$error]";
        }

        return $error;
    }

    public function register()
    {
        set_error_handler([$this, 'errorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }

    public function errorHandler($errno, $errstr, $file, $line)
    {
        $this->showError($errno, $errstr, $file, $line);
        return true;
    }

    public function exceptionHandler($e)
    {
        $this->showError(get_class($e), $e->getMessage(), $e->getFile(), $e->getLine(), 404);
        return true;
    }

    public function fatalErrorHandler()
    {
        if ($error = error_get_last() AND $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) 
        {
            $this->showError($error['type'], $error['message'], $error['file'], $error['line'], 500);
            return true;
        }
    }

    public function showError($errno, $errstr, $file, $line, $status = 500)
    {
        //header("HTTP/1.0 {$status}");
        echo $message = '<b><hr>' . self::getErrorName($errno) . "</b><hr>" . $errstr . '<hr> file: ' . $file . '<hr> line: ' . $line . '<hr>';
        echo '<br>';
    }

}
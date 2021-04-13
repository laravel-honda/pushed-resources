<?php

/**
 * @param mixed[] $__data
 *
 * @return false|string
 */
function __render_blade_do_not_use_or_you_will_get_fired(string $__php, array $__data)
{
    $obLevel = ob_get_level();
    ob_start();
    extract($__data, EXTR_SKIP);
    try {
        // Refer to the function name
        eval('?' . '>' . $__php);
    } catch (Exception $e) {
        while (ob_get_level() > $obLevel) {
            ob_end_clean();
        }
        throw $e;
    } catch (Throwable $e) {
        while (ob_get_level() > $obLevel) {
            ob_end_clean();
        }
        throw $e;
    }

    return ob_get_clean();
}

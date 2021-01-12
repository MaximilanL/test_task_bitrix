<?
define("ACCESS_FILE_MANAGER", false); // доступ к разделу "Файлы и папки"
define("ACCESS_BACKUP", false); // доступ к разделу "Резервное копирование"

define("ACCESS_FILE_MANAGER_BY_AUTH", true); // дополнительная авторизация для доступа в раздел "Файлы и папки"
define("ACCESS_BACKUP_BY_AUTH", true); // дополнительная авторизация для доступа в раздел "Резервное копирование"

define("ACCESS_LOGIN", 'admin'); // логин для дополнительной авторизации
define("ACCESS_PASS", '1S*9Xq#tk9'); // пароль для дополнительной авторизации

if (!ACCESS_FILE_MANAGER) {
    if (is_numeric(stripos($APPLICATION->GetCurPage(), 'fileman_admin.php')) && $_GET['logical'] != 'Y') {
        if (!ACCESS_FILE_MANAGER_BY_AUTH) {
            echo 'Доступ запрещен <a href="/bitrix/admin/">вернуться на главную</a>';
            die();
        } else {
            if ($_REQUEST['action'] == 'logout') {
                header("WWW-Authenticate: Basic realm=\"phpdevorg\"");
                header("HTTP/1.0 401 Unauthorized");
                echo "<script>window.location.href = '/bitrix/admin/'</script>";
                exit;
            }

            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"phpdevorg\"");
                header("HTTP/1.0 401 Unauthorized");
                echo "<script>window.location.href = '/bitrix/admin/'</script>";
                exit;
            } else {
                if (($_SERVER['PHP_AUTH_PW'] != ACCESS_PASS) || ($_SERVER['PHP_AUTH_USER'] != ACCESS_LOGIN)) {
                    header("WWW-Authenticate: Basic realm=\"phpdevorg\"");
                    header("HTTP/1.0 401 Unauthorized");
                    echo "<script>window.location.href = '/bitrix/admin/'</script>";
                    exit;
                }
            }
        }
    }
}

if (!ACCESS_BACKUP) {
    if (is_numeric(stripos($APPLICATION->GetCurPage(), 'dump.php')) || is_numeric(stripos($APPLICATION->GetCurPage(), 'dump_auto.php'))
        || is_numeric(stripos($APPLICATION->GetCurPage(), 'dump_list.php')) || is_numeric(stripos($APPLICATION->GetCurPage(), 'event_log.php'))) {
        if (!ACCESS_BACKUP_BY_AUTH) {
            echo 'Доступ запрещен <a href="/bitrix/admin/">вернуться на главную</a>';
            die();
        } else {
            if ($_REQUEST['action'] == 'logout') {
                header("WWW-Authenticate: Basic realm=\"phpdevorg\"");
                header("HTTP/1.0 401 Unauthorized");
                echo "<script>window.location.href = '/bitrix/admin/'</script>";
                exit;
            }

            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                header("WWW-Authenticate: Basic realm=\"phpdevorg\"");
                header("HTTP/1.0 401 Unauthorized");
                echo "<script>window.location.href = '/bitrix/admin/'</script>";
                exit;
            } else {
                if (($_SERVER['PHP_AUTH_PW'] != ACCESS_PASS) || ($_SERVER['PHP_AUTH_USER'] != ACCESS_LOGIN)) {
                    header("WWW-Authenticate: Basic realm=\"phpdevorg\"");
                    header("HTTP/1.0 401 Unauthorized");
                    echo "<script>window.location.href = '/bitrix/admin/'</script>";
                    exit;
                }
            }
        }
    }
}

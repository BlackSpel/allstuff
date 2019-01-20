<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <?= $this->getMeta() ?>
</head>

<h1>Шаблон default</h1>

<?= $content ?>

<? foreach ($posts as $post)
{
  echo 'Id '.$post['id'].' : '.$post->title.'<br/>';
}
?>

<? // Дебаг php red bean
use RedBeanPHP\R;
$logs = R::getDatabaseAdapter()
->getDatabase()
->getLogger();

debug( $logs->grep( 'SELECT' ) );
?>

</body>
</html>
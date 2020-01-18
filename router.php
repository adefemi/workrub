<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  

  <div class="notifier" id="notifier">
      <div class="close" id="notifier-close">
        <i  data-feather="x"></i>
      </div>
        <div id="notifier-text">
    
        </div>
  </div>
<?php

$dir = __DIR__;
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
    case $GLOBALS['base_url'] :
        require $dir . '/pages/home.php';
        break;
    case $GLOBALS['base_url'].'about-us' :
        require $dir . '/pages/about.php';
        break;        
    case $GLOBALS['base_url'].'career' :
        require $dir . '/pages/career.php';
        break;        
    case $GLOBALS['base_url'].'social-impact' :
        require $dir . '/pages/responsibilities.php';
        break;
    case $GLOBALS['base_url'].'resource' :
        require $dir . '/pages/resources.php';
        break;
    case $GLOBALS['base_url'].'functions' :
        require $dir . '/pages/function.php';
        break;
    case $GLOBALS['base_url'].'template' :
        require $dir . '/pages/template.php';
        break;
    default:
        if(preg_match_all('/resource\/[a-z0-9-_+]*/', $request)){
            require $dir . '/pages/singleResources.php';
            break;
        }
        else if(preg_match_all('/resource[a-z0-9-_+?=&]*/', $request)){
            require $dir . '/pages/resources.php';
            break;
        }
        else if(preg_match_all('/career\/[a-z0-9-_+]*/', $request)){
            require $dir . '/pages/singleCareer.php';
            break;
        }
        
        else if(preg_match_all('/career[a-z0-9-_+?=&]*/', $request)){
            require $dir . '/pages/career.php';
            break;
        }
        else if(preg_match_all('/schedule\/[a-z0-9-_+]*/', $request)){
            require $dir . '/pages/book.php';
            break;
        }
        else{
            require $dir . '/pages/404.php';
            break;
        }
}

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
<script src="<?php echo $GLOBALS['base_url'].'/assets/scripts/logics.js'?>"></script>
<script>
    feather.replace()
</script>
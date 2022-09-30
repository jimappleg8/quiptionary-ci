<?=$this->load->view('header', NULL, TRUE);?>

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Quiptionary</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/search.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Quiptionary</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

<?=form_open('definitions/index', array('class' => 'form-search'));?>

<label for="words" class="sr-only">Words to define</label>
<?=form_error('words');?>
<input type="text" id="words" name="words" class="form-control" placeholder="Words to define" value="<?=set_value('words');?>" required autofocus>
<button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
</form>

<?php if ( ! empty($definitions)): ?>

<dl>
<?php $last_word = ''; ?>
<?php $last_count = 1; ?>
<?php foreach ($definitions AS $def): ?>
	<?php if ($last_word != $def['entry_word']): ?>
		<?php $last_count = 1; ?>
<dt><?=$def['entry_word'];?></dt>
	<?php endif; ?>
<dd><strong><?=$last_count;?>.</strong>&nbsp;&nbsp;<i><?=$def['part_of_speech'];?></i>&nbsp;&nbsp;<?=$def['definition'];?> <i>&mdash; <?=$def['author'];?></i></dd>
	<?php $last_word = $def['entry_word']; ?>
	<?php $last_count++; ?>
<?php endforeach; ?>
</dl>

<!-- <div id="pagination"><?=$pagination;?></div> -->

<?php endif; ?>

        </div>
        <div class="col-md-2"></div>
      </div>


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>

<?=$this->load->view('footer', NULL, TRUE);?>
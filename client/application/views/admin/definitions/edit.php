<?=$this->load->view('admin/header', NULL, TRUE);?>

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

	<?php if ($admin['message'] != ''): ?>
	<div id="flash_alert"><?=$admin['message'];?></div>
	<?php endif; ?>


<?=form_open('admin/definitions/edit/'.$definition_id, array('class' => 'basic-form'));?>

  <div class="form-group<?php if(form_error('entry_word')){echo ' has-error';} ?>">
    <label class="control-label" for="entry_word">Entry Word</label>
    <?=form_input(array('type'=>'text', 'name'=>'entry_word', 'id'=>'entry_word', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('entry_word', @$definition['entry_word'], FALSE)));?>
    <?=form_error('entry_word', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('part_of_speech')){echo ' has-error';} ?>">
    <label class="control-label" for="part_of_speech">Part of Speech</label>
    <?=form_input(array('type'=>'text', 'name'=>'part_of_speech', 'id'=>'part_of_speech', 'class'=>'form-control', 'maxlength'=>'127', 'size'=>'40', 'value'=>set_value('part_of_speech', @$definition['part_of_speech'], FALSE)));?>
    <?=form_error('part_of_speech', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('plural')){echo ' has-error';} ?>">
      <dt><label for="plural">Plural</label></dt>
      <dd><?=form_dropdown('plural', $plural, set_value('plural', @$definition['plural'], FALSE), array('class'=>'form-control'));?>
    <?=form_error('plural', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('definition')){echo ' has-error';} ?>">
    <label class="control-label" for="definition">Definition:</label>
    <?=form_textarea(array('name'=>'definition', 'id'=>'definition', 'rows' => 4, 'class'=>'form-control', 'value'=>set_value('definition', @$definition['definition'], FALSE)));?>
    <?=form_error('definition', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('original_quote')){echo ' has-error';} ?>">
    <label class="control-label" for="original_quote">Original Quote:</label>
    <?=form_textarea(array('name'=>'original_quote', 'id'=>'original_quote', 'rows' => 4, 'class'=>'form-control', 'value'=>set_value('original_quote', @$definition['original_quote'], FALSE)));?>
    <?=form_error('original_quote', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('author')){echo ' has-error';} ?>">
    <label class="control-label" for="author">Author</label>
    <?=form_input(array('type'=>'text', 'name'=>'author', 'id'=>'author', 'class'=>'form-control', 'maxlength'=>'127', 'size'=>'40', 'value'=>set_value('author', @$definition['author'], FALSE)));?>
    <?=form_error('author', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('verified')){echo ' has-error';} ?>">
      <dt><label for="verified">Verified</label></dt>
      <dd><?=form_dropdown('verified', $verified, set_value('verified', @$definition['verified'], FALSE), array('class'=>'form-control'));?>
    <?=form_error('verified', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('source_id')){echo ' has-error';} ?>">
    <label class="control-label" for="source_id">Source ID</label>
    <?=form_input(array('type'=>'text', 'name'=>'source_id', 'id'=>'source_id', 'class'=>'form-control', 'maxlength'=>'127', 'size'=>'40', 'value'=>set_value('source_id', @$definition['source_id'], FALSE)));?>
    <?=form_error('source_id', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('source_date')){echo ' has-error';} ?>">
    <label class="control-label" for="source_date">Source Date</label>
    <?=form_input(array('type'=>'text', 'name'=>'source_date', 'id'=>'source_date', 'class'=>'form-control', 'maxlength'=>'127', 'size'=>'40', 'value'=>set_value('source_date', @$definition['source_date'], FALSE)));?>
    <?=form_error('source_date', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('source_description')){echo ' has-error';} ?>">
    <label class="control-label" for="source_description">Source Description:</label>
    <?=form_textarea(array('name'=>'source_description', 'id'=>'source_description', 'rows' => 4, 'class'=>'form-control', 'value'=>set_value('source_description', @$definition['source_description'], FALSE)));?>
    <?=form_error('source_description', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('other_sources')){echo ' has-error';} ?>">
    <label class="control-label" for="other_sources">Other Sources</label>
    <?=form_input(array('type'=>'text', 'name'=>'other_sources', 'id'=>'other_sources', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('other_sources', @$definition['other_sources'], FALSE)));?>
    <?=form_error('other_sources', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('definition_type')){echo ' has-error';} ?>">
    <label class="control-label" for="definition_type">Definition Type</label>
    <?=form_input(array('type'=>'text', 'name'=>'definition_type', 'id'=>'definition_type', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('definition_type', @$definition['definition_type'], FALSE)));?>
    <?=form_error('definition_type', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('keywords')){echo ' has-error';} ?>">
    <label class="control-label" for="keywords">Keywords</label>
    <?=form_input(array('type'=>'text', 'name'=>'keywords', 'id'=>'keywords', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('keywords', @$definition['keywords'], FALSE)));?>
    <?=form_error('keywords', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('categories')){echo ' has-error';} ?>">
    <label class="control-label" for="categories">Categories</label>
    <?=form_input(array('type'=>'text', 'name'=>'categories', 'id'=>'categories', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('categories', @$definition['categories'], FALSE)));?>
    <?=form_error('categories', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('source')){echo ' has-error';} ?>">
    <label class="control-label" for="source">Source</label>
    <?=form_input(array('type'=>'text', 'name'=>'source', 'id'=>'source', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('source', @$definition['source'], FALSE)));?>
    <?=form_error('source', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('context')){echo ' has-error';} ?>">
    <label class="control-label" for="context">Context</label>
    <?=form_input(array('type'=>'text', 'name'=>'context', 'id'=>'context', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('context', @$definition['context'], FALSE)));?>
    <?=form_error('context', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('foreign')){echo ' has-error';} ?>">
    <label class="control-label" for="foreign">Foreign</label>
    <?=form_input(array('type'=>'text', 'name'=>'foreign', 'id'=>'foreign', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('foreign', @$definition['foreign'], FALSE)));?>
    <?=form_error('foreign', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('language')){echo ' has-error';} ?>">
    <label class="control-label" for="language">Language</label>
    <?=form_input(array('type'=>'text', 'name'=>'language', 'id'=>'language', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('language', @$definition['language'], FALSE)));?>
    <?=form_error('language', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('sort')){echo ' has-error';} ?>">
    <label class="control-label" for="sort">Sort</label>
    <?=form_input(array('type'=>'text', 'name'=>'sort', 'id'=>'sort', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('sort', @$definition['sort'], FALSE)));?>
    <?=form_error('sort', '<span class="help-block">', '</span>');?>
  </div>

  <div class="form-group<?php if(form_error('game')){echo ' has-error';} ?>">
    <label class="control-label" for="game">Game</label>
    <?=form_input(array('type'=>'text', 'name'=>'game', 'id'=>'game', 'class'=>'form-control', 'maxlength'=>'255', 'size'=>'40', 'value'=>set_value('game', @$definition['game'], FALSE)));?>
    <?=form_error('game', '<span class="help-block">', '</span>');?>
  </div>

  <button type="submit" class="btn btn-default">Update definition</button>

</form>

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

<?=$this->load->view('admin/footer', NULL, TRUE);?>
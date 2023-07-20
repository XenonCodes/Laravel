<h2><?=$categories['name']?></h2>
<?php foreach($newsList as $news): ?>
<div>
    <h4><a href="<?=route('news.show', ['id' => $news['id'],'categories_id' => $categories['id']])?>"><?=$news['title']?></a></h4>
    <br>
    <img src="<?=$news['img']?>">
    <p><em><?=$news['author']?></em> &nbsp; (<?=$news['created_at']?>)</p>
    <p><?=$news['description']?></p>
</div>
<hr>
<?php endforeach; ?>
<hr>

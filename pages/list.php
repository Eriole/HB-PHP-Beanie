
    <table class="my-5 w-50 m-auto table table-bordered border-primary">
        <tr class="text-center">
            <th>Article</th>
            <th>Prix (TTC)</th>
            <th>Prix (TVA)</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
<?php
    foreach($articles as $key => $article){
        displayArticle($key, $article);
    };
?>
</table>


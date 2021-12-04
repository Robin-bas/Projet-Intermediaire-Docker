<!-- REST API -->
<route p="posts" controller="PostController" action="postsApi" params="id,number"/>
<route p="comments" controller="CommentController" action="commentsApi" params="id,mainId"/>

<?php
    include('db_connect.php');
    $requete_SQL = 'SELECT * FROM Users WHERE id=1';
    $response = $bdd->query( $requete_SQL );

    while ( $data = $response->fetch() ) {
        var_dump($data);
    } ?>
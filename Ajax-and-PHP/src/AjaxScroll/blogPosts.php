<?php
//sleep(2);

function isAjaxRequest () {
    return
        isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

function findBlogPosts($page) {
    $firstPost = 101;
    $perPage = 3;
    $offset = (($page - 1) * $perPage) + 1;

    $blogPosts = [];
    for($i=0; $i<$perPage; $i++) {
        $id = ($firstPost - 1) + $offset + $i;
        $blogPost = [
            'id' => $id,
            'title' => "Blog Post #$id",
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus urna dui, ultricies ut lacinia vel,
            lacinia quis velit. Aliquam varius, tortor ut pulvinar porta, turpis sapien tempor nibh, et feugiat
            sem ex ac ipsum. Quisque dignissim hendrerit purus. Praesent quis rhoncus dui. In sollicitudin in
            urna eget imperdiet. Ut at maximus sapien, ut feugiat velit. Etiam tempus luctus felis ut congue. Ut
            sollicitudin nibh dapibus nulla vulputate lobortis. Vestibulum quis faucibus mi. In at semper
            sapien. Cras ut ex mauris. Praesent laoreet malesuada eros, a fermentum sem posuere vitae. Aenean
            maximus libero justo, ac volutpat neque lobortis auctor. Donec ultrices pretium ex, eget rhoncus
            felis.',
        ];
        $blogPosts[] = $blogPost;
    }
    return $blogPosts;
}

if (!isAjaxRequest()) {exit;}

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$blogPosts = findBlogPosts($page);
?>

<?php foreach ($blogPosts as $blogPost) { ?>
    <div id="blog-post-<?php echo $blogPost['id']; ?>" class="blog-post">
        <h3><?php echo $blogPost['title']; ?></h3>
        <p><?php echo $blogPost['content']; ?></p>
    </div>
<?php } ?>

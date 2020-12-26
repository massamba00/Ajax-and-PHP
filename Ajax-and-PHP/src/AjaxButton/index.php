<?php
session_start();

if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

function isFavorite($id)
{
    return in_array($id, $_SESSION['favorites'], true);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajax button</title>
</head>
<style>
    #blog-posts {
        width: 700px;
    }

    .blog-post {
        border: 1px solid black;
        margin: 10px 10px 20px 10px;
        padding: 6px 10px;
    }

    .favorite-hearts {
        color: red;
        font-size: 2em;
        float: right;
        display: none;
    }

    .like .favorite-hearts {
        display: block;
    }

    button.favorite-button, button.unfavorite-button {
        background: #0000FF;
        color: white;
        text-align: center;
        width: 70px;
    }

    button.favorite-button:hover, button.unfavorite-button:hover {
        background: #000099;
    }

    button.favorite-button {
        display: inline;
    }
    .like button.favorite-button {
        display: none;
    }
    button.unfavorite-button {
        display: none;
    }
    .like button.unfavorite-button {
        display: inline;
    }
</style>
<body>
<div id="blog-posts">
    <div id="blog-post-101" class="blog-post <?php if (isFavorite('101')) {
        echo 'like';
    } ?>">
        <span class="favorite-hearts">&hearts;</span>
        <h3>Blog post 101</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus urna dui, ultricies ut lacinia vel,
            lacinia quis velit. Aliquam varius, tortor ut pulvinar porta, turpis sapien tempor nibh, et feugiat
            sem ex ac ipsum. Quisque dignissim hendrerit purus. Praesent quis rhoncus dui. In sollicitudin in
            urna eget imperdiet. Ut at maximus sapien, ut feugiat velit. Etiam tempus luctus felis ut congue. Ut
            sollicitudin nibh dapibus nulla vulputate lobortis. Vestibulum quis faucibus mi. In at semper
            sapien. Cras ut ex mauris. Praesent laoreet malesuada eros, a fermentum sem posuere vitae. Aenean
            maximus libero justo, ac volutpat neque lobortis auctor. Donec ultrices pretium ex, eget rhoncus
            felis.
        </p>
        <button class="favorite-button">Like</button>
        <button class="unfavorite-button">Dislike</button>
    </div>
    <div id="blog-post-102" class="blog-post <?php if (isFavorite('102')) {
        echo 'like';
    } ?>">
        <span class="favorite-hearts">&hearts;</span>
        <h3>Blog post 102</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus urna dui, ultricies ut lacinia vel,
            lacinia quis velit. Aliquam varius, tortor ut pulvinar porta, turpis sapien tempor nibh, et feugiat
            sem ex ac ipsum. Quisque dignissim hendrerit purus. Praesent quis rhoncus dui. In sollicitudin in
            urna eget imperdiet. Ut at maximus sapien, ut feugiat velit. Etiam tempus luctus felis ut congue. Ut
            sollicitudin nibh dapibus nulla vulputate lobortis. Vestibulum quis faucibus mi. In at semper
            sapien. Cras ut ex mauris. Praesent laoreet malesuada eros, a fermentum sem posuere vitae. Aenean
            maximus libero justo, ac volutpat neque lobortis auctor. Donec ultrices pretium ex, eget rhoncus
            felis.
        </p>
        <button class="favorite-button">Like</button>
        <button class="unfavorite-button">Dislike</button>
    </div>
    <div id="blog-post-103" class="blog-post <?php if (isFavorite('103')) {
        echo 'like';
    } ?>">
        <span class="favorite-hearts">&hearts;</span>
        <h3>Blog post 103</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus urna dui, ultricies ut lacinia vel,
            lacinia quis velit. Aliquam varius, tortor ut pulvinar porta, turpis sapien tempor nibh, et feugiat
            sem ex ac ipsum. Quisque dignissim hendrerit purus. Praesent quis rhoncus dui. In sollicitudin in
            urna eget imperdiet. Ut at maximus sapien, ut feugiat velit. Etiam tempus luctus felis ut congue. Ut
            sollicitudin nibh dapibus nulla vulputate lobortis. Vestibulum quis faucibus mi. In at semper
            sapien. Cras ut ex mauris. Praesent laoreet malesuada eros, a fermentum sem posuere vitae. Aenean
            maximus libero justo, ac volutpat neque lobortis auctor. Donec ultrices pretium ex, eget rhoncus
            felis.
        </p>
        <button class="favorite-button">Like</button>
        <button class="unfavorite-button">Dislike</button>
    </div>
</div>
<script>
    function like() {
        let parent = this.parentElement;
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'favorite.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let result = xhr.responseText;

                if (result === 'true') {
                    parent.classList.add('like');
                }
            }
        };
        xhr.send('id=' + parent.id);
    }

    function dislike() {
        let parent = this.parentElement;
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'unfavorite.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let result = xhr.responseText;

                if (result === 'true') {
                    parent.classList.remove('like');
                }
            }
        };
        xhr.send('id=' + parent.id);
    }

    let favoriteButtons = document.getElementsByClassName('favorite-button');
    for (let i = 0; i < favoriteButtons.length; i++) {
        favoriteButtons.item(i).addEventListener('click', like);
    }

    let unFavoriteButtons = document.getElementsByClassName('unfavorite-button');
    for (let i = 0; i < unFavoriteButtons.length; i++) {
        unFavoriteButtons.item(i).addEventListener('click', dislike);
    }
</script>
</body>
</html>

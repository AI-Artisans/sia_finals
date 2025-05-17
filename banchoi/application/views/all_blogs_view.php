<!-- application/views/all_blogs_view.php -->

<h1>All Blogs</h1>

<?php if (!empty($blogs)): ?>
    <?php foreach ($blogs as $blog): ?>
        <div class="blog-post">
            <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
            <p>
                <?php 
                // Show first 50 words - if word_limiter helper is loaded
                if (function_exists('word_limiter')) {
                    echo word_limiter($blog['content'], 50);
                } else {
                    // fallback: just substring first 300 chars if helper not loaded
                    echo htmlspecialchars(substr($blog['content'], 0, 300)) . '...';
                }
                ?>
            </p>
            <small>By User ID: <?php echo $blog['user_id']; ?> | Created at: <?php echo $blog['created_at']; ?></small>
        </div>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>No blogs found.</p>
<?php endif; ?>

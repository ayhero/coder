<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h4>浏览<?php
				// If this is a category archive
				if (is_category()) {
					printf('分类</h4>
				<h2>'.single_cat_title('', false).'</h2>' );
					if (category_description()) echo '<p>'.category_description().'</p>';
				// If this is a tag archive
				} elseif (is_tag()) {
					printf('标签</h4>
				<h2>'.single_tag_title('', false).'</h2>' );
					if (tag_description()) echo '<p>'.tag_description().'</p>';
				// If this is a daily archive
				} elseif (is_day()) {
					printf('日期存档</h4>
				<h2>'.get_the_time('Y年n月j日').'</h2>' );
				// If this is a monthly archive
				} elseif (is_month()) {
					printf('月份存档</h4>
					<h2>'.get_the_time('Y年n月').'</h2>' );
				// If this is a yearly archive
				} elseif (is_year()) {
					printf('年份存档</h4>
					<h2>'.get_the_time('Y年').'</h2>' );
					// If this is an author archive
				} elseif (is_author()) {
						echo '作者存档';
				// If this is a paged archive
				} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
					echo '博客存档';
				}
				?>

			</div>
			<div class="col-md-4">
				<div class="sort_by">
					<h3>排序</h3>
					<div class="btn-group">
					  <div class="btn-group">
						<a <?php if ( isset($_GET['order']) && ($_GET['order']=='rand') ) echo 'class="current"'; ?> href="<?php echo curPageURL() . '?' . http_build_query(array_merge($_GET, array('order' => 'rand'))); ?>">随机阅读</a>
						<a <?php if ( isset($_GET['order']) && ($_GET['order']=='commented') ) echo 'class="current"'; ?> href="<?php echo curPageURL() . '?' . http_build_query(array_merge($_GET, array('order' => 'commented'))); ?>">评论最多</a>
						<a <?php if ( isset($_GET['order']) && ($_GET['order']=='alpha') ) echo 'class="current"'; ?> href="<?php echo curPageURL() . '?' . http_build_query(array_merge($_GET, array('order' => 'alpha'))); ?>">标题排序</a>
					  </div>
					</div>
					
					
				</div>
			</div>
			
			<div class="col-md-1">
			
			</div>
				
			
		</div>
	</div>
	<!-- Column 1 /Content -->
	
<?php
global $wp_query;

if ( isset($_GET['order']) && ($_GET['order']=='rand') ) 
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'rand',
		'paged' => $paged,
	);
	$arms = array_merge(
		$args,
		$wp_query->query
	);
	query_posts($arms);
}
else if ( isset($_GET['order']) && ($_GET['order']=='commented') )
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'comment_count',
		'order' => 'DESC',
		'paged' => $paged,
	);
    $arms = array_merge(
		$args,
		$wp_query->query
	);
    query_posts($arms);
}
else if ( isset($_GET['order']) && ($_GET['order']=='alpha') )
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'title',
		'order' => 'ASC',
		'paged' => $paged,
	);
    $arms = array_merge(
		$args,
		$wp_query->query
	);
    query_posts($arms);
} 
?>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-8">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="panel panel-default  post">
				<div class="panel-body">
				<!-- Post Title -->
					<h3 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<!-- Post Data -->
					<p class="sub"><?php the_tags('标签：', ', ', ''); ?> &bull; <?php the_time('Y年n月j日') ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?><?php edit_post_link('编辑', ' &bull; ', ''); ?></p>
					<div class="hr dotted clearfix">&nbsp;</div>
					<!-- Post Image -->
					<img class="thumb" alt="" src="<?php bloginfo('template_url'); ?>/images/610x150.gif" />
					<!-- Post Content -->
					<?php the_excerpt(); ?>
					<!-- Read More Button -->
					<p class="clearfix"><a href="<?php the_permalink(); ?>" class="button right">阅读全文</a></p>
				</div>
				<div class="hr clearfix">&nbsp;</div>
			</div>
			<?php endwhile; ?>

			<!-- Blog Navigation -->
			<p class="clearfix"><?php previous_posts_link('&lt;&lt; 查看新文章', 0); ?> <span class="float right"><?php next_posts_link(' 查看旧文章 &gt;&gt;', 0); ?></span></p>
			<?php else : ?>
			<div class="panel panel-default  post">
				<div class="panel-body">
					<h3 class="text-center">没有找到任何文章！</h3>
				</div>
			</div>
			<?php endif; ?>
			</div>
			
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
			
	</div>
	
<?php get_footer(); ?>

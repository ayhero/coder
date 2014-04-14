<?php get_header(); ?>
<body>

	<h3>index.php</h3>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-right">心情夜雪</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">

			</div>
			<!--文章列表部分-->
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
				
				<div>
					<div class="panel-group" id="accordion">
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							  ......该写些什么东西?
							</a>
						  </h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in">
						  <div class="panel-body">
							图片，状态
						  </div>
						</div>
					  </div>
					</div>
					
				<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>   
</body>
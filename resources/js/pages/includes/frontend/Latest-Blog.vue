<template>
  <div id=latest-blog>
     <div class="container-fluid">
			<div class="section-header">
				<h3>Latest <span> Blog Post</span></h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-6">
					<article class="type-post">
						<div class="entry-cover">
							<a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="main_theme/images/latestblog1.jpg"></a>
						</div>
						<div class="entry-block">
							<div class="entry-contentblock">
								<div class="entry-meta">
									<span class="postdate">25th May 2016</span>
									<span class="postby">Posted by <a href="#" title="Methov jos">Methov jos</a></span>
								</div>
								<div class="entry-block">
									<div class="entry-title">
										<a title="Doloremque laudantium totam..." href="blogpost-page.html"><h3>Doloremque laudantium totam...</h3></a>
									</div>
								</div>
							</div>
							<div class="post-ic"><span class="icon icon-Pencil"></span></div>
						</div>
					</article>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6">
					<article class="type-post">
						<div class="entry-cover">
							<a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="main_theme/images/latestblog2.jpg"></a>
						</div>
						<div class="entry-block">
							<div class="entry-contentblock">
								<div class="entry-meta">
									<span class="postdate">25th May 2016</span>
									<span class="postby">Posted by <a href="#" title="Methov jos">Jennu Doe</a></span>
								</div>
								<div class="entry-block">
									<div class="entry-title">
										<a title="Minim veniam quis nostrud..." href="blogpost-page.html"><h3>Minim veniam quis nostrud...</h3></a>
									</div>
								</div>
							</div>
							<div class="post-ic"><span class="icon icon-MusicMixer"></span></div>
						</div>
					</article>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6">
					<article class="type-post">
						<div class="entry-cover">
							<a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="main_theme/images/latestblog3.jpg"></a>
						</div>
						<div class="entry-block">
							<div class="entry-contentblock">
								<div class="entry-meta">
									<span class="postdate">25th May 2016</span>
									<span class="postby">Posted by <a href="#" title="Methov jos">Steave Smith</a></span>
								</div>
								<div class="entry-block">
									<div class="entry-title">
										<a title="Perspiciatis unde omnis iste..." href="blogpost-page.html"><h3>Perspiciatis unde omnis iste...</h3></a>
									</div>
								</div>
							</div>
							<div class="post-ic"><span class="icon icon-Starship"></span></div>
						</div>
					</article>
				</div>
			</div>
			<div class="post-viewall">
				<a href="blog-page.html"  title="View All post">View All post</a>
			</div>
		</div>
  </div>
</template>

<script>
    export default {
        name:"Latest-Blog",
        mounted() {
            console.log('latest-blog')
        }
    }
</script>
 
<?php
/**
 *	Template Name: Page Query
 *
 * @package innovecs
 */

get_header();
?>

	<main id="primary" class="site-main">

	<div id="comments">
		<script>
			fetch('https://jsonplaceholder.typicode.com/posts/1/comments')
			.then((response) => response.json())
			.then(function(data) {
				console.log(data);
				const comments = document.querySelector('#comments')
				data.forEach(function(element) {

					let comment = document.createElement('div');
					comment.className = "comment";
					comments.appendChild(comment);
					let name = document.createElement('div');
					name.className = "name";
					let email = document.createElement('div');
					email.className = "email";
					let body = document.createElement('div');
					body.className = "body";

					for (let key in element) {
						name.innerHTML = element['name'];
						email.innerHTML = element['email'];
						body.innerHTML = element['body'];
						comment.append(name);
						comment.append(email);
						comment.append(body);					 
					}
				});				
			})
		</script>
	</div>

	</main><!-- #main -->

<?php
get_footer();

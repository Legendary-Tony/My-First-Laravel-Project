<template>
<div class="card mb-4">

<div class="card-body">
<h2 class="card-title"><a style="text-decoration: none;" href="slug">{{ title }}</a></h2>
<p class="card-text">{!! str_limit($post->body, 100, '...')  !!}</p>
<a href="slug" class="btn btn-primary">Read More &rarr;</a>
</div>
<div class="card-footer text-muted">
Posted {{created_at }} by
<a href="#">Legendary</a> 
<a style="text-decoration: none;" href="">
<small>0</small>
<i class="fas fa-thumbs-up"></i>
</a> 
</div>
</div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

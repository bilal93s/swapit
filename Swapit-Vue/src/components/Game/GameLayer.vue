<template>
		<div class="container">
			<div class="card" :class="[{ full: full , small:!full}]">
				<div class="content">
					<div class="card-img">
						<img src="data:image/jpeg;base64,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">
					</div>
					<div class="card-title">
						<h3>{{game.name}}</h3>
            <div class="card-platforms-tags">
              <span>PS4</span>
              <span>PS4</span>
            </div>
					</div>
				</div>
				<div class="card-details">
					<div class="card-body">
                        <div class="tags">
                            <span class="tag tag-teal">FPS</span>
                            <span class="tag tag-teal">Action</span>
                            <span class="tag tag-teal">Action RPG</span>
                            <span class="tag tag-teal">Action RPG</span>
                            <span class="tag tag-teal">Action RPG</span>
                        </div>
                        <div class="Synopsis">
                           <h4>
                                Cyberpunk 2077 est un jeu vidéo 
                            </h4>
                        </div>
                    
                        <p>
                            Exploré le monde distopique de cyberpunk...
                        </p>
                        <DetailsButton @click="showDetails = !showDetails" title="details"/>
                    </div>
				</div>
			</div>
		</div>
</template>

<script>
// import GameLayerDetails from './GameLayerDetails.vue';
  import DetailsButton from '../Buttons/Button_Details.vue';

  export default {
    name: "GameCard",
    components: {
      DetailsButton
    //   GameLayerDetails
    },
    data: () => ({
        filters : {},
        showDetails: false,
    }),
    props: {
        game: {
            type: Object,
            required: false,
        },
        full: {
            type: Boolean,
            default: true,
        },
    },
  };
  
</script>

<style scoped>
.container {
	position: relative;
	z-index: 1;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
	margin: auto;
}
.container .card {
	position: relative;
  border: none;
	width: 20rem;
	height: 30rem;
	background: rgba(255, 255, 255, 0.05);
	margin: 1rem;
	box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
	border-radius: 1em;
	display: flex;
	justify-content: center;
	align-items: center;
	backdrop-filter: blur(10px);
}
.container .card.small{
	width: 20rem;
	height: 30rem;
}
.container .card.full {
	width: 100%;
	height: 30rem;	
}
.card-body p {
  font-size: 1rem;
  /* margin: 0 0 40px; */
}
.container .card .content {
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
  transition: 0.5s ease-in-out;
  /* max-width: 15vw; */
	/* max-height: 15vw; */
}
.container .card .content .card-img {
  top: 2em;
  width: 9.375rem;
	height: 9.375rem;
  max-width: 30vw;
  max-height: 30vw;
	position: relative;
	overflow: hidden;
  transition: 0.5s ease-in-out;
}
.container .card .content .card-img img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
}
.container .card .content .card-title {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin: 2rem;
  padding: 0.5rem;
  transition: 0.5s ease-in-out;
  /* top: 2em; */
  width: 9.375rem;
	height: 9.375rem;
  max-width: 30vw;
  max-height: 30vw;
}


.container .card .content .card-title {
	color: rgba(255, 93, 25, 1);
	text-transform: uppercase;
	letter-spacing: 0.125rem;
	font-weight: 500;
	font-size: 1.125rem;
	text-align: center;
	line-height: 1.1em;
}

.container .card .content .card-title .card-platforms-tags {
	font-size: 0.75rem;
  width: 100%;
	text-transform: initial;
  transition: 0.5s ease-in-out;
}
.container .card .content .card-title .card-platforms-tags span {
  margin: 2%;
	text-transform: initial;
}
.container .card .card-details {
	position: absolute;
	bottom: 2em;
  left: 2vw;
	display: flex;
}
.container .card .card-details .card-body {
	list-style: none;
	margin: 0 10px;
	transform: translateY(2%);
  
  transition: all 0.75s ease-out;
	opacity: 0;
}

.container .card .card-details .card-body .tags {
	display: flex;
  flex-wrap: wrap;
}

.container .card .card-details .card-body a {
	color: rgba(255, 93, 25, 1);
	font-size: 1.25rem;
}
.tag {
  background: #cccccc;
  border-radius: 50px;
  font-size: 8px;
  margin: 0;
  color: #fff;
  padding: 2px 10px;
  text-transform: uppercase;
  cursor: pointer;
  margin: 0.5rem;
}

.tag:hover {
  background: #fff;
  color: #cccccc;
}

.tag-teal {
  background-color: rgba(255, 93, 25, 1);
}





.container .card.full:hover .content {
	transform: translateY(-30%);
}

.container .card.small:hover .content {
	transform: translateY(-50%);
}

.container .card.small:hover .content .card-title .card-platforms-tags{
  opacity: 0;
}

.container .card:hover .card-details .card-body {
	transform: translateY(0vmin);
	opacity: 1;
}

/* .container .card:hover .content .card-img {
  top: 2em;
	width: 3em;
  height: 3em;
}

.container .card:not(:hover) .content .card-img {
  top: 2em;
	width: 3em;
  height: 3em;
  width: 9.375rem;
	height: 9.375rem;
} */

.container .card.small:hover .content .card-img {
  width: 3rem;
	height: 3rem;
  max-width: 15vw;
	max-height: 15vw;
}
/* 
.container .card.small:not(:hover) .content .card-img {
  top: 2em;
  width: 9.375rem;
	height: 9.375rem;
  max-width: 30vw;
  max-height: 30vw;
} */

.container .card.full:hover .content .card-img {
  top: 5rem;
  width: 9.375rem;
	height: 9.375rem;
  max-width: 15vw;
	max-height: 15vw;
  transform: translateX(-30vw);
}

.container .card.full:hover .content .card-title {
  transform: translate(15vw,-10vh);
  
}

/* .container .card.full:not(:hover) .content .card-img {
  top: 2em;
  width: 9.375rem;
	height: 9.375rem;
} */

@media screen and (max-width: 400px) {
  .container .card:hover .content {
    opacity: 0;
  }
}


</style>
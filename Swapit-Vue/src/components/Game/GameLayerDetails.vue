<template>
    <div>
        <div class="card">
            <div class="card-header">
                <img src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg" alt="rover" />
            </div>
            <div class="card-body">
                <span class="tag tag-teal">{{game.name}}</span>
                <h4>
                    {{game.summary}}
                </h4>
                <p>
                    {{game.summary}}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "GameLayerDetails",
    data: () => ({
      filters : {}
    }),
    props: {
      game: {
        type: Object,
        required: true,
      },
    },
  };
</script>

<style scoped>
.flex-game-layer{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    height: 250px;
}
* {
  box-sizing: border-box;
}

.card {
  margin: 10px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  width: 300px;
}

.card-header img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}
.card-body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 20px;
  min-height: 250px;
}

.tag {
  background: #cccccc;
  border-radius: 50px;
  font-size: 12px;
  margin: 0;
  color: #fff;
  padding: 2px 10px;
  text-transform: uppercase;
  cursor: pointer;
}
.tag-teal {
  background-color: #47bcd4;
}
.tag-purple {
  background-color: #5e76bf;
}
.tag-pink {
  background-color: #cd5b9f;
}

.card-body p {
  font-size: 13px;
  margin: 0 0 40px;
}
</style>
<template>
    <div class="flex-game-layer">
        <div class="container-game-layer">
            <div class="game-layer">
                <div class="game-img">
                        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1tmu.png" width="80" height="80">
                </div>
                <div class="info-game">
                    <div class="title-game">{{game.name}}</div>
                    <div class="game-details">
                        <div class="game-desc">{{game.summary}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "GameCard",
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
.container-game-layer {
    background-image: url("https://images.igdb.com/igdb/image/upload/t_1080p/co1tmu.png");
    background-repeat: no-repeat;
	background-size: cover;
    background-position: center;
    width: 90%;
    height: 200px;
    border-radius: 20px;
    margin: 100px 20px;
    display: flex;
}
.game-layer {
    display: flex;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    padding: 20px;
    width: 100%;
}
.game-img{
    width: auto;
    height: 100%;
    border-radius: 20px;
    margin-right: 30px;
}
.game-img img{
    width: auto;
    height: 100%;
    border-radius: 20px;
}
.info-game{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 80%;
    font-weight: bold;
}
.title-game{
    font-size: 16px;
    color: rgba(255, 93, 25, 1);
    margin-bottom: 20px;
}
.game-desc{
    font-size: 12px;
    color: rgba(41, 100, 124);
    height: 90px;
    overflow: hidden;
}
</style>
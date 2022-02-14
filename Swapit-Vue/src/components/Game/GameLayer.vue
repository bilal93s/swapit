<template>
    <div class="container-game-layer">
        <div class="game-layer">
            <div class="game-img">
                    <img src="../../assets/images/acv.png" width="80" height="80">
            </div>
            <div class="info-game">
                <div class="title-game">{{game.name}}</div>
                <div class="game-details">
                    <div class="game-desc">{{game.summary}}</div>
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
.container-game-layer {
    background-image: url("https://cdn1.epicgames.com/400347196e674de89c23cc2a7f2121db/offer/AC%20KINGDOM%20PREORDER_STANDARD%20EDITION_EPIC_Key_Art_Portrait_640x854-640x854-288120c5573756cb988b6c1968cebd86.png");
    background-repeat: no-repeat;
	background-size: cover;
    background-position: center;
    width: 80%;
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
    margin-right: 40px;
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
    font-size: 27px;
    color: rgba(255, 93, 25, 1);
    margin-bottom: 20px;
}
.game-desc{
    width: 50%;
    font-size: 12px;
    color: rgba(41, 100, 124);
    height: 90px;
    overflow: hidden;
}
</style>
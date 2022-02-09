<template>
    <div class="container-game-card">
        <div class="game-card">
            <div class="game-img">
                    <img src="../../assets/images/acv.png" width="80" height="80">
            </div>
            <div class="info-game">
                <div class="title-game">Assassin's Creed Valhalla</div>
                <div class="game-details">
                    <div class="game-desc">Black Ops Cold War will drop fans into the depths of the Cold War’s volatile geopolitical battle of the early 1980s. Nothing is ever as it seems in a gripping single-player Campaign, where players will come face-to-face with historical figures and hard truths, as they battle around the globe through iconic locales like East Berlin, Vietnam, Turkey, Soviet KGB headquarters and more.</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

</script>

<style>
.container-game-card {
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
.game-card {
    display: flex;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    padding: 20px;
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
    font-size: 40px;
    color: rgba(255, 93, 25, 1);
    margin-bottom: 20px;
}
.game-desc{
    width: 50%;
    height: 100%;
    font-size: 12px;
    color: rgba(41, 100, 124);
}
</style>
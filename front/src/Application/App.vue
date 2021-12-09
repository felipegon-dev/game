<template>
    <b-container>
        <b-row class="mt-3">
            <button class="btn-primary" @click="start()">Start Game</button>
        </b-row>
        <div v-if="data !== null">
            <b-row class="mt-3">
                <current-player-component :data="data" />
            </b-row>
            <b-row class="mt-5">
                <board-component :data="data" @eventClickSendMove=updateData />
            </b-row>
        </div>
    </b-container>
</template>


<script>
    import Api from './api/Api'
    import BoardComponent from './components/BoardComponent';
    import CurrentPlayerComponent from './components/CurrentPlayerComponent';

    export default {
        components: {
            BoardComponent, CurrentPlayerComponent
        },

        data() {
            return {
                data: null
            }
        },

        methods: {
            updateData(position) {
                // TODO: an exception can happen if the move is invalid or the game is finish, capture it and show a div with information
                this.data = Api.updateGame(this.data, position);
            },

            start() {
                this.data = Api.startGame();
            }
        }
    }
</script>
<style>
    table, th, td {
        border: 1px solid black;
    }
    td {
        height: 50px;
        width: 200px;
        text-align: center;
    }
    .X {
        color: red;
    }
    .Y {
        color: blue;
    }
</style>
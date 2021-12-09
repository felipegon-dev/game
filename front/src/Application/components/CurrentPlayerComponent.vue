<template>
    <p>Current player: <span :class="data.currentPlayer">{{data.currentPlayer}}</span></p>
</template>


<script>
    export default {
        props: {
            data: {
                type: Object,
                default: function () {
                    return null
                }
            }
        }
    }
</script>
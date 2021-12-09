<template>
    <table>
        <tr>
            <td class="clickable" v-for="(item, index) in (data.items.length > 0 ? data.items : [])" :key="index" @click="sendMove(index)">
                <span :class="item.item">{{item.item}}</span>
            </td>
        </tr>
    </table>
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
        },
        methods: {
            sendMove(position) {
                this.$emit('eventClickSendMove', { position: position })
            }
        }
    }
</script>

<style scoped>
    .clickable {
        cursor: pointer;
    }
</style>
// import Api from './api/Axios'

const Api = {
    startGame: () => {
        return {
            players: ['X', 'Y'],
            currentPlayer: 'X',
            items: [
                {
                    item: 'X',
                },
                {
                    item: null,
                },
                {
                    item: 'Y',
                },
            ]
        }

    },
    updateGame: () => {
        return {
            players: ['X', 'Y'],
            currentPlayer: 'Y',
            items: [
                {
                    item: 'X',
                },
                {
                    item: 'X',
                },
                {
                    item: 'Y',
                },
            ]
        }
    }
}

export default Api
require('./bootstrap');

window.Vue = require('vue');

// import Note from './models/Note'
// import NoteComment from './models/NoteComment'
import NoteList from './components/NoteList'

const app = new Vue({
    el: '#app',
    data: {
        notes: []
    },
    mounted() {
        axios.get('/api/notes')
            .then(response => {
                this.notes = response.data;
            })
            .catch(response => {
                console.log(response);
            });
    },
    components: {
        NoteList
    }

});

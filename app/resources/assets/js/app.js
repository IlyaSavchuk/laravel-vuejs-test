require('./bootstrap');

window.Vue = require('vue');

import VeeValidate from 'vee-validate'
import store from './store'
import {VInput, VTextArea, VFileSelect, VButton} from './vueComponents'

Vue.use(VeeValidate)

const app = new Vue({
    el: '#app',
    data: {
        note: {},
        selectNote: {}
    },
    computed: {
        notes() {
            return store.state.notes
        }
    },
    store,
    components: {
        VInput, VTextArea, VFileSelect, VButton
    },
    mounted() {
        store.commit('getNotes')
    },
    methods: {
        remove(id) {
            store.dispatch('removeNote', {id: id})
        },
        save() {
            if (this.note.id) {
                store.dispatch('updateNote', this.note)
            } else {
                store.dispatch('addNote', this.note)
            }
            this.note = {}
        },
        edit(id) {
            $('html, body').animate({scrollTop: 0}, 500, 'swing');
            $('#name').focus();
            this.note = this.notes.find(function (item) {
                return item.id === id
            })
        },
        addComment(note) {
            store.dispatch('addComment', note)
        }
    }
});

<template>
    <multiselect v-model="selected" :options="options" :multiple="multiple" :taggable="taggable"
        placeholder="Select option" label="name" track-by="name" />
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
    components: {
        Multiselect
    },
    props: {
        value: {
            type: [Array, Object, String, Number],
            default: () => []
        },
        options: {
            type: Array,
            required: true
        },
        multiple: {
            type: Boolean,
            default: false
        },
        taggable: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            selected: this.value
        }
    },
    watch: {
        selected(newValue) {
            this.$emit('input', newValue)
        },
        value(newValue) {
            this.selected = newValue
        }
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

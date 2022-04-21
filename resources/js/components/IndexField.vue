<template>
    <input type="hidden" id="testing-code" :value="field.value">
    <div class="flex">
        <template v-if="hasValue">
            <div v-if="field.asHtml" class="flex-grow" @click.stop v-html="value"></div>
            <span v-else class="whitespace-nowrap flex-grow">{{ value }}</span>
            <svg v-if="field.showCopyToClipboard" @click.stop="copyToClipboard" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
            </svg>
            <svg v-if="masked" @mousedown.stop="toggle" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none cursor-pointer" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
            <svg v-else @mouseup.stop="toggle" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </template>
        <p v-else>&mdash;</p>
    </div>
</template>

<script>

export default {
    props: ['resourceName', 'field'],
    data() {
        return {
            show: false,
            masked: true,
        }
    },
    methods: {
        toggle() {
            return this.masked = !this.masked;
        },
        async copyToClipboard() {
            try {
                await navigator.clipboard.writeText(this.field.value);
                Nova.$toasted.show(this.__('Copied'), {type: 'success'});
            } catch ($e) {
                Nova.$toasted.show(this.__('Copying failed'), {type: 'error'});
            }
        },
    },
    computed: {
        value: function () {
            return this.masked
                ? this.field.value.replace(/./g, '•')
                : this.field.value;
        },
        /**
         * Determine if the field has a value other than null.
         */
        hasValue() {
            return this.field.value !== null
        },
    },
}
</script>

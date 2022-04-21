<template>
    <DefaultField
        :field="currentField"
        :errors="errors"
        :show-help-text="showHelpText"
    >
        <template #field>
            <div class="flex items-center">
                <input
                    v-bind="extraAttributes"
                    class="w-full form-control form-input form-input-bordered mr-2"
                    @input="handleChange"
                    :value="value"
                    :id="currentField.uniqueKey"
                    :dusk="field.attribute"
                    :disabled="currentlyIsReadonly"
                    :list="`${field.attribute}-list`"
                    :type="type"
                />
                <svg v-if="masked" @click="toggle" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none cursor-pointer" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
                <svg v-else @click="toggle" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
            <datalist
                v-if="currentField.suggestions && currentField.suggestions.length > 0"
                :id="`${field.attribute}-list`"
            >
                <option
                    :key="suggestion"
                    v-for="suggestion in currentField.suggestions"
                    :value="suggestion"
                />
            </datalist>
        </template>
    </DefaultField>
</template>

<script>
import { DependentFormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [HandlesValidationErrors, DependentFormField],

    data() {
        return {
            masked: true,
        }
    },
    methods: {
        toggle() {
            return this.masked = !this.masked;
        },
    },
    computed: {
        type: function () {
            return this.masked ? 'password' : 'text';
        },
        defaultAttributes() {
            return {
                //type: this.currentField.type || 'password',
                min: this.currentField.min,
                max: this.currentField.max,
                step: this.currentField.step,
                pattern: this.currentField.pattern,
                placeholder: this.currentField.placeholder || this.field.name,
                class: this.errorClasses,
            }
        },

        extraAttributes() {
            const attrs = this.currentField.extraAttributes

            return {
                // Leave the default attributes even though we can now specify
                // whatever attributes we like because the old number field still
                // uses the old field attributes
                ...this.defaultAttributes,
                ...attrs,
            }
        },
    },
}
</script>

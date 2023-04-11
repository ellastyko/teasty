<template>
    <layout :guest="guest">
        <template #main>
            <div class="content-wrapper w-full h-full flex justify-center">
                <div class="content-section bg-black opacity-90 w-2/3 mt-32 p-3">
                    <!--  Content nav bar
                    ---------------->
                    <div v-if="contentNavBar" class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                            <li class="mr-2" role="presentation">
                                <a
                                    href="/receipts"
                                    class="inline-block p-4 border-b-2 rounded-t-lg"
                                    type="button"
                                    role="tab"
                                    aria-controls="profile"
                                    aria-selected="false"
                                >
                                    Recommended
                                </a>
                            </li>
                            <li class="mr-2" role="presentation">
                                <a
                                    href="/receipts/create"
                                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    type="button"
                                    role="tab"
                                    aria-controls="dashboard"
                                >
                                    Create receipt
                                </a>
                            </li>
                            <li class="mr-2" role="presentation">
                                <a
                                    href="/receipts/saved"
                                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="settings-tab"
                                    data-tabs-target="#settings"
                                    type="button"
                                    role="tab"
                                    aria-controls="settings"
                                    aria-selected="false"
                                >
                                    Saved
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--  Content slot
                    ---------------->
                    <slot name="content"/>
                </div>
            </div>
        </template>
    </layout>
</template>

<script>

export default {
    name: "ContentSection",
    props: {
        contentNavBar: {
            type: Boolean,
            default: true
        },
        guest: {
            type: Boolean,
            default: false
        },
    },
    data() {
        return {
            name: '',

        }
    },
    mounted() {
    },
    components: { },
    methods: {  }
}
</script>

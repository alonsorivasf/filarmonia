<template>
    <app-layout title="Solicitudes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Altas
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2" v-if="showButtons == true">
                    <div class="bg-white rounded-lg shadow-xl lg:flex lg:max-w-lg hover:bg-red-300 transition duration-500 hover:scale-105" @click="showAgregarInstrumental=false, showAgregarBecario=true, showButtons=false">
                        <img src="https://scontent.fcjs4-1.fna.fbcdn.net/v/t39.30808-6/225754396_3939685266154454_9104167856466099739_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=973b4a&_nc_ohc=RroIrdQx0GEAX-z2HvY&_nc_ht=scontent.fcjs4-1.fna&oh=00_AT-NCWV4qgc3l4sguxGxQ2p9waSGZnwNhlAVM-Jjjln2Qw&oe=61DA6457"
                            class="w-1/1 lg:w-1/2 rounded-l-2xl">
                        <div class="p-6">
                            <h2 class="mb-2 text-2xl font-bold text-gray-900">Alta de becario</h2>
                            <p class="text-gray-600">Agrega nuevos becarios al programa.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-xl lg:flex lg:max-w-lg hover:bg-red-300 transition duration-500 hover:scale-105" @click="showAgregarInstrumental=true, showAgregarBecario=false, showButtons=false">
                        <img src="https://us.123rf.com/450wm/melnikof/melnikof1708/melnikof170800087/84192299-banda-sinf%C3%B3nica-y-de-metales-concepto-de-percusi%C3%B3n-e-instrumentos-de-viento-un-hermoso-primer-plano-.jpg"
                            class="w-1/1 lg:w-1/2 rounded-l-2xl">
                        <div class="p-6">
                            <h2 class="mb-2 text-2xl font-bold text-gray-900">Alta de instrumental</h2>
                            <p class="text-gray-600">Agrega nuevo instrumental.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <AgregarBecario v-if="showAgregarBecario == true" @cancelar="cancelar"/>
                    <AgregarInstrumental v-if="showAgregarInstrumental==true" @cancelar="cancelar"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import SolicitudMedico from '@/Pages/solicitudes/solicitudMedico.vue'
    import SolicitudDonador from '@/Pages/solicitudes/solicitudDonador.vue'
    import AgregarBecario from '@/Pages/altas/agregarBecario.vue'
    import AgregarInstrumental from '@/Pages/altas/agregarInstrumental.vue'


    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
            SolicitudMedico,
            SolicitudDonador,
            AgregarBecario,
            AgregarInstrumental,
        },
        data() {
            return{
                showButtons: true,
                showAgregarInstrumental: false,
                showAgregarBecario: false,
            }
        },
        methods: {
            cancelar(){
                this.showButtons = true;
                this.showAgregarInstrumental = false;
                this.showAgregarBecario = false;
            },
        }
    })
</script>

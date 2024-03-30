<template>
    <div>
        <h2 v-if="step === 1">Step 1: Select Vision Need</h2>
        <select v-if="step === 1" v-model="visionNeed">
            <option value="">Select Vision Need</option>
            <option v-for="need in visionNeeds" :key="need.id" :value="need.id">{{ need.name }}</option>
        </select>
        <button v-if="step === 1 && visionNeed" @click="storeVisionNeed">Next</button>

        <h2 v-if="step === 2">Step 2: Upload Prescription Image</h2>
        <input type="file" v-if="step === 2" @change="uploadPrescriptionImage">
        <button v-if="step === 2 && image" @click="nextStep(3)">Next</button>

        <h2 v-if="step === 3">Step 3: Select Lens Type</h2>
        <select v-if="step === 3" v-model="lensType">
            <option value="">Select Lens Type</option>
            <option v-for="type in lensTypes" :key="type.id" :value="type.id">{{ type.name }}</option>
        </select>
        <button v-if="step === 3 && lensType" @click="storeLensType">Next</button>

        <h2 v-if="step === 4">Step 4: Select Lens Performance</h2>
        <select v-if="step === 4" v-model="lensPerformance">
            <option value="">Select Lens Performance</option>
            <option v-for="performance in lensPerformances" :key="performance.id" :value="performance.id">{{
            performance.name }}</option>
        </select>
        <button v-if="step === 4 && lensPerformance" @click="storeLensPerformance">Next</button>

        <h2 v-if="step === 5">Step 5: Select Lens Thickness</h2>
        <select v-if="step === 5" v-model="lensThickness">
            <option value="">Select Lens Thickness</option>
            <option v-for="thickness in lensThicknesses" :key="thickness.id" :value="thickness.id">{{ thickness.name }}
            </option>
        </select>
        <button v-if="step === 5 && lensThickness" @click="createLens">Create Lens</button>

        <!-- Rest of the lens selection steps -->
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            step: 1,
            visionNeed: '',
            lensType: '',
            lensPerformance: '',
            lensThickness: '',
            visionNeeds: [],
            lensTypes: [],
            lensPerformances: [],
            lensThicknesses: [],
            image: null,
            selectedGlassesId: null,
            selectedGlasses: null,
        };
    },
    mounted() {
        this.selectedGlassesId = this.$route.params.glassesId;
        this.fetchVisionNeeds();
        this.fetchLensTypes();
        this.fetchLensPerformances();
        this.fetchLensThicknesses();
    },
    methods: {
        fetchVisionNeeds() {
            axios.get('http://127.0.0.1:8000/api/vision-needs')
                .then(response => {
                    this.visionNeeds = response.data;
                })
                .catch(error => {
                    console.error('Error fetching vision needs:', error);
                });
        },
        fetchLensTypes() {
            axios.get('http://127.0.0.1:8000/api/TypeHome')
                .then(response => {
                    this.lensTypes = response.data;
                })
                .catch(error => {
                    console.error('Error fetching lens types:', error);
                });
        },
        fetchLensPerformances() {
            axios.get('http://127.0.0.1:8000/api/PerformanceHome')
                .then(response => {
                    this.lensPerformances = response.data;
                })
                .catch(error => {
                    console.error('Error fetching lens performances:', error);
                });
        },
        fetchLensThicknesses() {
            axios.get('http://127.0.0.1:8000/api/ThiknessHome')
                .then(response => {
                    this.lensThicknesses = response.data;
                })
                .catch(error => {
                    console.error('Error fetching lens thicknesses:', error);
                });
        },
        storeVisionNeed() {
            if (!this.selectedGlassesId) {
                console.error('No glasses selected.');
                return; // Stop execution if no glasses are selected
            }

            axios.post('http://127.0.0.1:8000/api/lenses/vision-need', {
                glasses_id: this.selectedGlassesId,
                vision_need_id: this.visionNeed
            })
                .then(response => {
                    console.log(response.data);
                    this.nextStep(2); // Move to the next step after successfully storing vision need
                })
                .catch(error => {
                    console.error('Error storing vision need:', error);
                });
        },

        uploadPrescriptionImage(event) {
            this.image = event.target.files[0];
            console.log("prescription inserted")
        },



        storeLensType() {
            if (!this.selectedGlassesId) {
                console.error('No glasses selected.');
                return; // Stop execution if no glasses are selected
            }

            axios.post('http://127.0.0.1:8000/api/lenses/lens-type', {
                glasses_id: this.selectedGlassesId,
                lens_type_id: this.lensType
            })
                .then(response => {
                    console.log(response.data);
                    this.nextStep(4);
                })
                .catch(error => {
                    console.error('Error storing lens type:', error);
                });
        },


        storeLensPerformance() {
            if (!this.selectedGlassesId) {
                console.error('No glasses selected.');
                return; // Stop execution if no glasses are selected
            }

            axios.post('http://127.0.0.1:8000/api/lenses/lens-performance', {
                glasses_id: this.selectedGlassesId, // Pass the selectedGlassesId
                lens_performance_id: this.lensPerformance
            })
                .then(response => {
                    console.log(response.data);
                    this.nextStep(5); // Move to the next step after successfully storing lens performance
                })
                .catch(error => {
                    console.error('Error storing lens performance:', error);
                });
        },

        storeLensThickness() {
            if (!this.selectedGlassesId) {
                console.error('No glasses selected.');
                return; // Stop execution if no glasses are selected
            }

            axios.post('http://127.0.0.1:8000/api/lenses/lens-thickness', {
                glasses_id: this.selectedGlassesId, // Pass the selectedGlassesId
                lens_thickness_id: this.lensThickness
            })
                .then(response => {
                    console.log(response.data);
                    this.nextStep(5); // Move to the next step after successfully storing lens thickness
                })
                .catch(error => {
                    console.error('Error storing lens thickness:', error);
                });
        },

        createLens() {
            const formData = new FormData();
            formData.append('glasses_id', this.selectedGlassesId);
            formData.append('vision_need_id', this.visionNeed);
            formData.append('image', this.image);
            formData.append('lens_type_id', this.lensType);
            formData.append('lens_thickness_id', this.lensThickness);
            formData.append('lens_performance_id', this.lensPerformance);


            axios.post('http://127.0.0.1:8000/api/lenses/storeLens', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response.data);
                    // Resetting data and navigating to another page
                    this.resetData();
                    this.$router.push('/client/home');
                })
                .catch(error => {
                    console.error('Error creating lens:', error);
                });
        },

        nextStep(step) {
            this.step = step;
        },
        resetData() {
            this.step = 1;
            this.visionNeed = '';
            this.lensType = '';
            this.lensPerformance = '';
            this.lensThickness = '';
            this.prescriptionImage = null;
            this.selectedGlassesId = null;
            this.selectedGlasses = null;
        }
    }
};
</script>

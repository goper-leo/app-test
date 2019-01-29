<template>
  <tr>
    <td v-text="data.division"></td>
    <td v-text="data.total"></td>
  </tr>
</template>

<script>
  export default {

    props: {
      data: {
        required: true,
      }

    },



  }
</script>

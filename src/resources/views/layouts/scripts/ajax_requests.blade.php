

{{-- <script>    
    // console.log("Running Ajax Reuqests");    
        async function makeRequest(method, route, token, params = {}) {
            try {
                const config = {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    }
                };
        
                let response;
        
                if (method.toLowerCase() === 'get') {
                    response = await axios.get(route, config);
                } else if (method.toLowerCase() === 'post') {
                    response = await axios.post(route, params, config);
                } else {
                    throw new Error('Invalid method. Use GET or POST.');
                }
        
                if (response.data.success) {
                    // console.log("Received data from ", route, ":", response.data.data);
                    return response.data.data; 
                } else {
                    console.error("API Request Error:", response.data.message);
                    return null;
                }
            } catch (error) {
                console.error('Error in API request:', error);
    
                // Log the server's response in case of a problem
                if (error.response) {
                    // The request was made and the server responded with a status code
                    // that falls out of the range of 2xx
                    console.error('Server responded with bad status:', error.response.status); // For status code
    
                    // If the server has sent a response, log it for debugging
                    if (error.response.data) {
                        console.error('Server response data:', error.response.data); // For detailed error message
                        
                        // If there are validation errors, they may be in the data property
                        if (error.response.data.errors) {
                            console.error('Validation errors:', error.response.data.errors);
                        }
                    }
                } else if (error.request) {
                    // The request was made but no response was received, `error.request` is an instance of XMLHttpRequest
                    console.error('No response received:', error.request);
                } else {
                    // Something happened in setting up the request and triggered an error
                    console.error('Error message:', error.message);
                }
                
                return null;
            }
        }
        
        
        </script> --}}
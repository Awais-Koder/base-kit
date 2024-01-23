<script>
    async function submitPivotUsersFlags(method) {
        var headers = {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };

        let formData = new FormData();
        if (method === 'POST') {
            formData.append('isOpenRightSidebar', 1);
        }

        let url = method === 'POST' ? '/pivot_users_flags' : '/pivot_users_flags/delete';

        return makeRequest(url, method, headers, method === 'POST' ? formData : null)
            .then(response => {
                console.log('Operation successful');
                return response; // Resolve the promise with the response
            })
            .catch(error => {
                console.error('Error:', error);
                throw error; // Propagate the error
            });
    }

    async function makeRequest(url, method, headers, body) {
        const response = await fetch(url, {
            method: method,
            headers: headers,
            body: body
        });
        // Check if the response has content and is of type JSON
        const contentType = response.headers.get('content-type');
        if (contentType && contentType.includes('application/json')) {
            const data = await response.json(); // Parse JSON only if the content type is JSON
            if (!response.ok) {
                throw new Error(data.message || `HTTP error! status: ${response.status}`);
            }
            return data;
        } else {
            if (!response.ok) {
                // Handle non-JSON responses or no content responses
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return null; // Return null or appropriate value for non-JSON responses
        }
    }
    
</script>
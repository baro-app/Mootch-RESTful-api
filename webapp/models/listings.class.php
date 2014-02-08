<?

    class listings extends base_model {

        function get_tags($id) {
            return $this->get_rows("SELECT * FROM listing_tags WHERE listing_id={$id}");
        }

        function get_dates($id) {
            return $this->get_rows("SELECT * FROM listing_dates WHERE listing_id={$id}");
        }

        function get_images($id) {
            return $this->get_rows("SELECT * FROM listing_images WHERE listing_id={$id}");
        }

        function search($q) {
            return $this->get_rows("SELECT * FROM listings WHERE title LIKE '%{$q}%'");
        }

        function get_full_listing($id) {
            $listing = $this->get_by_id($id);
            if($listing) {
                $listing['images'] = $this->get_images($id);
                $listing['tags'] = $this->get_tags($id);
                $listing['dates'] = $this->get_dates($id);
            }
            return $listing;
        }
   
    }

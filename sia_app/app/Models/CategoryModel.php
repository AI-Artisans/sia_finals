<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'bitbybit_categories';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'date_created';
    protected $updatedField = 'last_updated';
    protected $deletedField = 'deleted_at';
    
    protected $allowedFields = [
        'name',
        'slug',
        'description',
        'parent_id',
        'icon',
        'color'
    ];
    
    protected $validationRules = [
        'name' => 'required|min_length[2]|max_length[100]',
        'slug' => 'required|min_length[2]|max_length[100]|alpha_dash|is_unique[bitbybit_categories.slug,id,{id}]'
    ];
    
    protected $validationMessages = [
        'name' => [
            'required' => 'Category name is required',
            'min_length' => 'Category name must be at least 2 characters long',
            'max_length' => 'Category name cannot exceed 100 characters'
        ],
        'slug' => [
            'required' => 'Category slug is required',
            'min_length' => 'Category slug must be at least 2 characters long',
            'max_length' => 'Category slug cannot exceed 100 characters',
            'alpha_dash' => 'Category slug can only contain alphanumeric characters, underscores, and dashes',
            'is_unique' => 'This category slug is already taken'
        ]
    ];
    
    /**
     * Get all categories with post counts
     *
     * @return array
     */
    public function getCategoriesWithCounts()
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('bitbybit_categories');
        $builder->select('bitbybit_categories.*, COUNT(bitbybit_posts.id) as post_count');
        $builder->join('bitbybit_posts', 'bitbybit_posts.category = bitbybit_categories.slug', 'left');
        $builder->where('bitbybit_categories.deleted_at IS NULL');
        $builder->groupBy('bitbybit_categories.id');
        $builder->orderBy('bitbybit_categories.name', 'ASC');
        
        $query = $builder->get();
        return $query->getResultArray();
    }
    
    /**
     * Get parent categories
     *
     * @return array
     */
    public function getParentCategories()
    {
        return $this->where('parent_id IS NULL')
            ->orderBy('name', 'ASC')
            ->findAll();
    }
    
    /**
     * Get subcategories for a parent category
     *
     * @param int $parentId Parent category ID
     * @return array
     */
    public function getSubcategories($parentId)
    {
        return $this->where('parent_id', $parentId)
            ->orderBy('name', 'ASC')
            ->findAll();
    }
    
    /**
     * Get category by slug
     *
     * @param string $slug Category slug
     * @return array|null
     */
    public function getCategoryBySlug($slug)
    {
        return $this->where('slug', $slug)
            ->first();
    }
    
    /**
     * Get categories as a nested array
     *
     * @return array
     */
    public function getCategoriesNested()
    {
        $parentCategories = $this->getParentCategories();
        
        foreach ($parentCategories as &$parent) {
            $parent['subcategories'] = $this->getSubcategories($parent['id']);
        }
        
        return $parentCategories;
    }
    
    /**
     * Create a new category
     *
     * @param array $data Category data
     * @return int|false New category ID or false on failure
     */
    public function createCategory($data)
    {
        // Generate slug if not provided
        if (!isset($data['slug']) || empty($data['slug'])) {
            $data['slug'] = url_title($data['name'], '-', true);
        }
        
        // Check if slug exists
        $existingCategory = $this->where('slug', $data['slug'])->first();
        if ($existingCategory) {
            // Append a number to make it unique
            $count = 1;
            $originalSlug = $data['slug'];
            do {
                $data['slug'] = $originalSlug . '-' . $count++;
                $existingCategory = $this->where('slug', $data['slug'])->first();
            } while ($existingCategory);
        }
        
        return $this->insert($data);
    }
} 